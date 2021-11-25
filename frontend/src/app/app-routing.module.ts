import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AboutUsComponent } from './components/about-us/about-us.component';
import { ContactComponent } from './components/contact/contact.component';
import { GetaquoteComponent } from './components/getaquote/getaquote.component';
import { HomeComponent } from './components/home/home.component';
import { LayoutComponent } from './components/layouts/layout/layout.component';
import { PortfolioComponent } from './components/portfolio/portfolio.component';
import { PrivacyComponent } from './components/privacy/privacy.component';
import { ServicesComponent } from './components/services/services.component';
import { SiteMapComponent } from './components/site-map/site-map.component';
import { TermsComponent } from './components/terms/terms.component';
import { TestimonialsComponent } from './components/testimonials/testimonials.component';

const routes: Routes = [
  {
    path: '', component: LayoutComponent,
    children: [
      {
        path: '', component: HomeComponent
      },
      {
        path: 'services', component: ServicesComponent
      },
      {
        path: 'contact' , component: ContactComponent
      },
      {
        path: 'portfolio' , component: PortfolioComponent
      },
      {
        path: 'testimonials' , component: TestimonialsComponent
      },
      {
        path: 'about-us' , component: AboutUsComponent
      },
      {
        path: 'privacy' , component: PrivacyComponent
      },
      {
        path: 'site-map' , component: SiteMapComponent
      },
      {
        path: 'terms' , component: TermsComponent
      },
      {
        path: 'get-a-quote' , component: GetaquoteComponent
      },
    ]
  },
  // otherwise redirect to home
  { 
    path: '**',
    redirectTo: ''
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes, {
    scrollPositionRestoration: 'enabled'
  })],
  exports: [RouterModule]
})
export class AppRoutingModule { }
