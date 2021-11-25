import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../../services/http.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CustomValidator } from './../../../shared/validator/validator';
import { environment } from './../../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { TranslateService } from '@ngx-translate/core';
import { SharedService } from './../../../shared/shared.service';

// declare const scroll_top_top:any;

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {
  footerLogo:any;
  footerDetails:any = [];
  serviceList:any = [];
  soWhatnext:any = [];

  enquiryForm: FormGroup;
  public submitted = false;

  currentRouterName: any = '';

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    private formBuilder: FormBuilder,
    private toastr: ToastrService,
    private translateService: TranslateService,
    private sharedService:SharedService,
  ) { }

  ngOnInit(): void {
    this.footerSectionDetails();
    // Enquiry form
    this.enquiryForm = this.formBuilder.group({
      name: ['', Validators.required],
      phone_number: ['', Validators.required],
      email: ['', [Validators.required,CustomValidator.email]],
      message: ['', Validators.required],
    });
    // scroll to top
    // scroll_top_top();

    // Get current route name
    if (this.route.snapshot.url.length) {
      this.currentRouterName = this.route.snapshot.url[0].path;
    } else {
      this.currentRouterName = 'home';
    }
  }

  footerSectionDetails() {
  	this.http.setModule('footer').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      this.soWhatnext = response.footer_details.details.cms_details;
      this.footerLogo = response.footer_details.details.site_settings.footer_logo;
      this.footerDetails = response.footer_details.details.site_settings;
      // Service list
      this.serviceList = response.footer_details.details.services;
    });
  }

  // Enquiry form submit
  get enquiryFormVal() {
    return this.enquiryForm.controls;
  }
  submitEnquiryForm() {
    this.submitted = true;
    if (this.enquiryForm.invalid) {
      return;
    } else {
      this.enquiryForm.value.lang = localStorage.getItem('currentLanguage');
      this.http.setModule('capture_enquiry').create(this.enquiryForm.value).subscribe((response) => {
        if (response.enquiry_form_details.status == 200) {
          this.toastr.success(this.translateService.instant('success_enquiry_message'), this.translateService.instant('label_success'));
          this.enquiryForm.reset();
          this.submitted = false;
        } else {
          this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
          this.submitted = false;
        }
      }, (error) => {
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
        this.submitted = false;
      });
    }
  }

  // For own page (when current route services)
  scrollToOwnElement(itemSection){
    this.sharedService.sendClickEvent(itemSection);
  }

}
