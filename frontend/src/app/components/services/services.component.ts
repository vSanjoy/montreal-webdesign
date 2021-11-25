import {  Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { from } from 'rxjs';
import { HttpService } from './../../services/http.service';
import { environment } from './../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { connectableObservableDescriptor } from 'rxjs/internal/observable/ConnectableObservable';
import { TranslateService } from '@ngx-translate/core';
import { SharedService } from './../../shared/shared.service';

declare const scroll_top_top:any;

@Component({
  selector: 'app-services',
  templateUrl: './services.component.html',
  styleUrls: ['./services.component.scss']
})
export class ServicesComponent implements OnInit {
  pageDetails:any = [];
  serviceList:any = [];

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    private toastr: ToastrService,
    private translateService: TranslateService,
    private sharedService:SharedService,
  ) {
    // For receiving another component event and other functionalities
    this.sharedService.getClickEvent().subscribe((response) => {
      this.scrollToPosition(response);
    })
  }

  ngOnInit(): void {
    this.servicesPageDetails();
  }

  // Getting service page details
  servicesPageDetails() {
    this.http.setModule('services').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      if (response.service_page_details.status == 200) {
        // Page details
        this.pageDetails = response.service_page_details.details.cmsPage;
        // Service
        this.serviceList = response.service_page_details.details.services;

        // Header / Footer links Scroll to position from another page (not from service page)
        var scrollToBlock: string = this.route.snapshot.queryParamMap.get('block');
        if (scrollToBlock != null) {
          this.scrollToPosition(scrollToBlock);
        }
        
        // scroll to top
        scroll_top_top();
      } else {
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
      }
    });
  }

  // Footer links Scroll to position
  scrollToPosition(scrollToBlock): void {
    setTimeout(function() {
      var element = document.getElementById(scrollToBlock);
      element.scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});

      setTimeout(function() {
        var newURL = location.protocol + '//' + location.host + location.pathname;
        window.history.pushState({page: this.href}, '',newURL);
      }, 1000);  
    }, 500);
  }

}
