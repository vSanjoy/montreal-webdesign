import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../services/http.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CustomValidator } from './../../shared/validator/validator';
import { environment } from './../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { TranslateService } from '@ngx-translate/core';

declare const scroll_top_top:any;

@Component({
  selector: 'app-getaquote',
  templateUrl: './getaquote.component.html',
  styleUrls: ['./getaquote.component.scss']
})
export class GetaquoteComponent implements OnInit {
  pageDetails:any = [];
  siteKey: string;
  // siteLanguage: string;
  getAQuoteForm: FormGroup;
  public getAQuoteSubmitted = false;

  public theme: 'light' | 'dark' = 'light';
  public size: 'compact' | 'normal' = 'normal';
  public siteLanguage = 'en';
  dayNumbers = Array(31).fill(0).map((x,i)=>i);
  monthNumbers = Array(12).fill(0).map((x,i)=>i);
  currentYear = new Date().getFullYear();
  yearRange:any = [];
  hearAboutUsList: any= [];
  budgetList: any= [];

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    private formBuilder: FormBuilder,
    private toastr: ToastrService,
    private translateService: TranslateService,
  ) {
    this.siteKey = '6LdezDQbAAAAAFgiI8dOOh4DGabUf_GjXobPrfcS';
    // this.siteKey = '6Lf-9TcbAAAAAKJ7hW-_dBthQB2XFVcQVBLidtzS';
    // Future 5 years
    this.yearRange.push(this.currentYear);
    for (var i = 1; i < 5; i++) {
      this.yearRange.push(this.currentYear + i);
    }

    // this.hearAboutUsList = [this.translateService.instant('label_colleague'), this.translateService.instant('label_google'), this.translateService.instant('label_yahoo'), this.translateService.instant('label_msn'), this.translateService.instant('label_bing'), this.translateService.instant('label_facebook'), this.translateService.instant('label_twitter')];
    // this.budgetList = ['750$ - 1500$', '1,500$ - 2,500$', '2,500$ - 5,000$', this.translateService.instant('label_more_than')+' 5,000$'];

    this.hearAboutUsList = ['Colleague', 'Google', 'Yahoo', 'MSN', 'Bing', 'Facebook', 'Twitter'];
    this.budgetList = ['750$ - 1500$', '1,500$ - 2,500$', '2,500$ - 5,000$', 'More than 5,000$'];
  }

  ngOnInit(): void {
    this.getAQuotePageDetails();

    // Quote form
    this.getAQuoteForm = this.formBuilder.group({
      name: ['', Validators.required],
      business_name: ['', Validators.required],
      how_many_employees: ['', Validators.required],
      phone_number: ['', Validators.required],
      email: ['', [Validators.required, CustomValidator.email]],
      city: ['', Validators.required],
      // hear_about_us: [this.translateService.instant('label_colleague')],
      hear_about_us: ['Colleague'],
      website_description: ['', Validators.required],
      static_website_html_non_flash: [false],
      dynamic_website_flash_website_animated: [false],
      static_website_with_flash_intro: [false],
      logo_creation: [false],
      domain_name_registration: [false],
      website_maintenance: [false],
      website_hosting: [false],
      search_engine_submission: [false],
      english_language_website: [false],
      french_language_website: [false],
      bilingual_language_website: [false],
      number_of_english_pages: [''],
      number_of_english_graphics: [''],
      number_of_french_pages: [''],
      number_of_french_graphics: [''],
      day: ['1'],
      month: ['1'],
      year: [this.currentYear],
      budget: ['750$ - 1500$'],
      recaptcha: ['', Validators.required]
    });
  }

  getAQuotePageDetails() {
  	this.http.setModule('get_a_quote').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      if (response.get_a_quote_page_details.status == 200) {
        // Contact page details
        this.pageDetails = response.get_a_quote_page_details.details.cmsPage;
        
        // scroll to top
        scroll_top_top();
      } else {
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
      }
    });
  }

  // Enquiry form submit
  get getAQuoteFormVal() {
    return this.getAQuoteForm.controls;
  }
  submitGetAQuoteForm() {
    this.getAQuoteSubmitted = true;
    if (this.getAQuoteForm.invalid) {
      return;
    } else {
      this.getAQuoteForm.value.lang = localStorage.getItem('currentLanguage');
      this.http.setModule('capture_get_a_quote').create(this.getAQuoteForm.value).subscribe((response) => {
        if (response.quote_form_details.status == 200) {
          this.toastr.success(this.translateService.instant('success_enquiry_message'), this.translateService.instant('label_success'));
          this.getAQuoteForm.reset();
          this.getAQuoteSubmitted = false;

          // reload
          let currentUrl = this.router.url;
          this.router.routeReuseStrategy.shouldReuseRoute = () => false;
          this.router.onSameUrlNavigation = 'reload';
          this.router.navigate([currentUrl]);
        } else {
          this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
          this.getAQuoteSubmitted = false;
        }
      }, (error) => {
        // this.toastr.error(error.error.message, 'Error!');
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
        this.getAQuoteSubmitted = false;
      });
    }
  }

  resetGetAQuoteForm() {
    // reload
    let currentUrl = this.router.url;
    this.router.routeReuseStrategy.shouldReuseRoute = () => false;
    this.router.onSameUrlNavigation = 'reload';
    this.router.navigate([currentUrl]);
  }

}
