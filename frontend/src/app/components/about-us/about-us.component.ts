import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../services/http.service';
import { environment } from './../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { TranslateService } from '@ngx-translate/core';

declare const scroll_top_top:any;

@Component({
  selector: 'app-about-us',
  templateUrl: './about-us.component.html',
  styleUrls: ['./about-us.component.scss']
})
export class AboutUsComponent implements OnInit {
  featuredImage:any;
  pageDetails:any = [];

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    private toastr: ToastrService,
    private translateService: TranslateService,
  ) { }

  ngOnInit(): void {
    this.aboutPageDetails();
  }

  // Getting about page details
  aboutPageDetails() {
    this.http.setModule('about_us').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      if (response.about_page_details.status == 200) {
        // About page details
        this.pageDetails = response.about_page_details.details.cmsPage;
        
        // scroll to top
        scroll_top_top();
      } else {
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
      }
    });
  }

}
