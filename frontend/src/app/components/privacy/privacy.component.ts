import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../services/http.service';
import { environment } from './../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { TranslateService } from '@ngx-translate/core';

declare const scroll_top_top:any;

@Component({
  selector: 'app-privacy',
  templateUrl: './privacy.component.html',
  styleUrls: ['./privacy.component.scss']
})
export class PrivacyComponent implements OnInit {
  pageDetails:any = [];

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    private toastr: ToastrService,
    private translateService: TranslateService,
  ) { }

  ngOnInit(): void {
    this.privacyPageDetails();
  }

  // Getting privacy page details
  privacyPageDetails() {
    this.http.setModule('privacy').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      if (response.privacy_page_details.status == 200) {
        // Site map page details
        this.pageDetails = response.privacy_page_details.details.cmsPage;
        
        // scroll to top
        scroll_top_top();
      } else {
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
      }
    });
  }

}
