import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../services/http.service';
import { environment } from './../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { TranslateService } from '@ngx-translate/core';

declare const scroll_top_top:any;

@Component({
  selector: 'app-testimonials',
  templateUrl: './testimonials.component.html',
  styleUrls: ['./testimonials.component.scss']
})
export class TestimonialsComponent implements OnInit {
  pageDetails:any = [];
  testimonialList:any = [];

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    private toastr: ToastrService,
    private translateService: TranslateService,
  ) { }

  ngOnInit(): void {
    this.testimonialPageDetails();
  }

  // Getting testimonial page details
  testimonialPageDetails() {
    this.http.setModule('testimonials').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      if (response.testimonial_page_details.status == 200) {
        // Page details
        this.pageDetails = response.testimonial_page_details.details.cmsPage;
        // Testimonials
        this.testimonialList = response.testimonial_page_details.details.testimonials;
        
        // scroll to top
        scroll_top_top();
      } else {
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
      }
    });
  }

}
