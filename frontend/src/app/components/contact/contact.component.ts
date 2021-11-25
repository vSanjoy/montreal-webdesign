import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { DomSanitizer,SafeResourceUrl } from '@angular/platform-browser';
import { HttpService } from './../../services/http.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CustomValidator } from './../../shared/validator/validator';;
import { environment } from './../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { TranslateService } from '@ngx-translate/core';

declare const scroll_top_top:any;

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {
  pageDetails:any = [];
  websiteSettingsDetails:any = [];
  url: SafeResourceUrl;

  contactForm: FormGroup;
  public contactSubmitted = false;
  public theme: 'light' | 'dark' = 'light';
  public size: 'compact' | 'normal' = 'normal';
  public siteLanguage = 'en';
  siteKey: string;

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    public sanitizer:DomSanitizer,
    private toastr: ToastrService,
    private translateService: TranslateService,
    private formBuilder: FormBuilder,
  ) {
    this.siteKey = '6LdezDQbAAAAAFgiI8dOOh4DGabUf_GjXobPrfcS';
    // this.siteKey = '6Lf-9TcbAAAAAKJ7hW-_dBthQB2XFVcQVBLidtzS';
  }

  ngOnInit(): void {
    this.contactPageDetails();
    // Contact form
    this.contactForm = this.formBuilder.group({
      name: ['', Validators.required],
      email: ['', [Validators.required,CustomValidator.email]],
      message: ['', Validators.required],
      recaptcha: ['', Validators.required]
    });
  }

  // Getting contact page details
  contactPageDetails() {
    this.http.setModule('contact').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      if (response.contact_page_details.status == 200) {
        // Contact page details
        this.pageDetails = response.contact_page_details.details.cmsPage;
        // Website settings
        this.websiteSettingsDetails = response.contact_page_details.details.site_settings;
        
        // scroll to top
        scroll_top_top();
      } else {
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
      }
    });
  }

  // Contact form submit
  get contactFormVal() {
    return this.contactForm.controls;
  }
  submitContactForm() {
    this.contactSubmitted = true;
    if (this.contactForm.invalid) {
      return;
    } else {
      this.contactForm.value.lang = localStorage.getItem('currentLanguage');
      this.http.setModule('capture_contact').create(this.contactForm.value).subscribe((response) => {
        if (response.contact_form_details.status == 200) {
          this.toastr.success(this.translateService.instant('success_enquiry_message'), this.translateService.instant('label_success'));
          this.contactForm.reset();
          this.contactSubmitted = false;

          // reload
          let currentUrl = this.router.url;
          this.router.routeReuseStrategy.shouldReuseRoute = () => false;
          this.router.onSameUrlNavigation = 'reload';
          this.router.navigate([currentUrl]);
        } else {
          this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
          this.contactSubmitted = false;
        }
      }, (error) => {
        // this.toastr.error(error.error.message, 'Error!');
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
        this.contactSubmitted = false;
      });
    }
  }

}
