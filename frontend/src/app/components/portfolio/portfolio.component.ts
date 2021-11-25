import { Component, OnInit, Inject } from '@angular/core';
import { Router, ActivatedRoute } from '@angular/router';
import { HttpService } from './../../services/http.service';
import { environment } from './../../../environments/environment';
import { ToastrService } from 'ngx-toastr';
import { TranslateService } from '@ngx-translate/core';

declare const scroll_top_top:any;

@Component({
  selector: 'app-portfolio',
  templateUrl: './portfolio.component.html',
  styleUrls: ['./portfolio.component.scss']
})
export class PortfolioComponent implements OnInit {
  pageDetails:any = [];
  portfolioCategories:any = [];
  allPortfolios:any = [];
  categoryDetails:any = [];
  categoryPortfolios:any = [];
  portfolioImageSource:any;
  allWork = true;
  otherCategory = false;
  noRecordsMessage:any;

  constructor(
    @Inject(Router) private router,
    @Inject(HttpService) private http,
    @Inject(ActivatedRoute) private route,
    private toastr: ToastrService,
    private translateService: TranslateService,
  ) { }

  ngOnInit(): void {
    this.portfoliosPageDetails();
  }

  // Getting portfolio page details
  portfoliosPageDetails() {
    this.allWork = true;
    this.otherCategory = false;
    this.http.setModule('portfolios').list({lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      if (response.portfolio_page_details.status == 200) {
        // Page details
        this.pageDetails = response.portfolio_page_details.details.cmsPage;
        // Portfolio Categories
        this.portfolioCategories = response.portfolio_page_details.details.portfolioCategories;
        // All portfolios
        this.portfolioImageSource = environment.image_url + response.portfolio_page_details.details.portfolio.image_source;
        this.allPortfolios = response.portfolio_page_details.details.allPortfolio.list;

        // scroll to top
        scroll_top_top();
      } else {
        this.toastr.error('Oops! Something went wrong, please try again later.', 'Error!');
      }
    });
  }

  openPortfolioTab(categoryId) {
    this.allWork = false;
    this.otherCategory = true;
    this.http.setModule('category_portfolios').list({'category_id' : categoryId, lang: localStorage.getItem('currentLanguage')}).subscribe((response) => {
      if (response.category_portfolio_list.status == 200) {
        // Category details
        this.categoryDetails  = response.category_portfolio_list.details.portfolioCategoryDetails;
        // Category wise portfolios
        this.portfolioImageSource = environment.image_url + response.category_portfolio_list.details.portfolio.image_source;
        this.categoryPortfolios = response.category_portfolio_list.details.categoryPortfolio.list;
        // No records message
        this.noRecordsMessage = response.category_portfolio_list.details.portfolioMessage.details;
      } else {
        this.toastr.error(this.translateService.instant('error_something_went_wrong'), this.translateService.instant('label_error'));
      }
    });
  }

  openAllPortfolioTab() {
    this.portfoliosPageDetails();
  }

}




