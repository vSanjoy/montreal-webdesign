import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../services/http.service';
import { environment } from './../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { TranslateService } from '@ngx-translate/core';

declare const scroll_top_top:any;

@Component({
  selector: 'app-site-map',
  templateUrl: './site-map.component.html',
  styleUrls: ['./site-map.component.scss']
})

export class SiteMapComponent implements OnInit {
  pageDetails:any = [];

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    private toastr: ToastrService,
    private translateService: TranslateService,
  ) { }

  ngOnInit(): void {
    this.sitemapPageDetails();
  }

  // Getting site map page details
  sitemapPageDetails() {
    this.http.setModule('site_map').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      if (response.site_map_page_details.status == 200) {
        // Site map page details
        this.pageDetails = response.site_map_page_details.details.cmsPage;
        
        // scroll to top
        scroll_top_top();
      } else {
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
      }
    });
  }

}
