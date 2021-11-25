import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../../services/http.service';
import { environment } from './../../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { TranslateService } from '@ngx-translate/core';
import { SharedService } from './../../../shared/shared.service';

declare const sticky_header:any;
declare const responsiveMenu:any;

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {
  headerLogo:any;
  headerDetails:any = [];
  services:any = [];
  localstorageLanguage:any;

  currentRouterName: any = '';
  urlParameter:any;

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    public translate: TranslateService,
    private toastr: ToastrService,
    private sharedService:SharedService,
  ) {
    // Set default Language
    translate.addLangs(['en', 'fr']);
    if (localStorage.getItem('currentLanguage') == null) {
      translate.setDefaultLang('en');
      localStorage.setItem('currentLanguage', 'en');
      this.localstorageLanguage = localStorage.getItem('currentLanguage');
    } else {
      translate.setDefaultLang(localStorage.getItem('currentLanguage'));
      this.localstorageLanguage = localStorage.getItem('currentLanguage');
    }
  }

  ngOnInit(): void {
    this.headerSectionDetails();
    sticky_header();
    // responsiveMenu();

    // Get current route name
    if (this.route.snapshot.url.length) {
      this.currentRouterName = this.route.snapshot.url[0].path;
    } else {
      this.currentRouterName = 'home';
    }
  }

  headerSectionDetails() {
  	this.http.setModule('header').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      this.headerLogo = response.header_details.details.site_settings.header_logo;
      this.services = response.header_details.details.services;
    });
  }

  // Language switcher
  switchLanguage(lang: string) {
    this.translate.use(lang);
    localStorage.setItem('currentLanguage', lang);

    if (this.currentRouterName.indexOf("services") !== -1) {
      // reload
      let currentUrl = this.route.snapshot.url[0].path;
      this.router.routeReuseStrategy.shouldReuseRoute = () => false;
      this.router.onSameUrlNavigation = 'reload';
      this.router.navigate([currentUrl]);
      // location.reload();
    } else {
      // reload
      let currentUrl = this.router.url;
      this.router.routeReuseStrategy.shouldReuseRoute = () => false;
      this.router.onSameUrlNavigation = 'reload';
      this.router.navigate([currentUrl]);
      // location.reload();
    }
  }

  // For own page (when current route services)
  scrollToOwnElement(itemSection){
    this.sharedService.sendClickEvent(itemSection);
  }

}
