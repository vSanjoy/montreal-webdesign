import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../services/http.service';
import { environment } from './../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { OwlOptions } from 'ngx-owl-carousel-o';
import { TranslateService } from '@ngx-translate/core';

declare const equelHeight:any;
declare const scroll_top_top:any;

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  homeDetails:any = [];
  serviceWidgets:any = [];
  aboutDetails:any = [];
  portfolios:any = [];
  websiteSettingsDetails:any = [];

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    private toastr: ToastrService,
    private translateService: TranslateService,
  ) { }

  ngOnInit(): void {
    this.homePageDetails();
  }

  // Getting home page details
  homePageDetails() {
    this.http.setModule('home').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      if (response.home_page_details.status == 200) {
        // Home page details
        this.homeDetails = response.home_page_details.details.cmsPages[0];
        // Service widgets
        this.serviceWidgets = response.home_page_details.details.services;
        // About details
        this.aboutDetails = response.home_page_details.details.cmsPages[1];
        // Portfolio
        this.portfolios = response.home_page_details.details.portfolios;
        // Website settings
        this.websiteSettingsDetails = response.home_page_details.details.site_settings;
        
        equelHeight();
        // scroll to top
        scroll_top_top();
        
      } else {
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
      }
    });
  }

  customOptions: OwlOptions = {
    loop: true,
    mouseDrag: true,
    touchDrag: true,
    pullDrag: false,
    dots: false,
    autoplay:true,
    autoplayTimeout:9000,
    navSpeed: 700,
    margin:20,
    navText: ['Previous', 'Next'],
    responsive: {
      0: {
        items: 1 
      },
      400: {
        items: 1
      },
      740: {
        items: 3
      },
      1199: {
        items: 4
      }
    },
    nav: false
  };

}
