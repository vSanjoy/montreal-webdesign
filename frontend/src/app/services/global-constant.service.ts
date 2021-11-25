import { Injectable } from '@angular/core';
import { environment } from './../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class GlobalConstantService {

  constructor() { }

  API_URL = environment.api_url;

  public apiModules: any= {
    header:{
      url:environment.api_url + '/header/',
      methods:[
        {name: 'list', type:'get', url:'header-details'},
      ]
    },
    home:{
      url:environment.api_url + '/home/',
      methods:[
        {name: 'list', type:'get', url:'home-page-details'},
      ]
    },
    services:{
      url:environment.api_url + '/services/',
      methods:[
        {name: 'list', type:'get', url:'service-page-details'},
      ]
    },
    portfolios:{
      url:environment.api_url + '/portfolios/',
      methods:[
        {name: 'list', type:'get', url:'portfolio-page-details'},
      ]
    },
    category_portfolios:{
      url:environment.api_url + '/category/',
      methods:[
        {name: 'list', type:'get', url:'portfolio-list'},
      ]
    },
    testimonials:{
      url:environment.api_url + '/testimonials/',
      methods:[
        {name: 'list', type:'get', url:'testimonial-page-details'},
      ]
    },
    contact:{
      url:environment.api_url + '/contact/',
      methods:[
        {name: 'list', type:'get', url:'contact-page-details'},
      ]
    },
    capture_contact:{
      url:environment.api_url + '/contact-us/',
      methods:[
        {name: 'create', type:'post', url:'contact'},
      ]
    },
    about_us:{
      url:environment.api_url + '/about-us/',
      methods:[
        {name: 'list', type:'get', url:'about-page-details'},
      ]
    },
    get_a_quote:{
      url:environment.api_url + '/get-a-quote/',
      methods:[
        {name: 'list', type:'get', url:'get-a-quote-page-details'},
      ]
    },
    capture_get_a_quote:{
      url:environment.api_url + '/capture-quote/',
      methods:[
        {name: 'create', type:'post', url:'quote-form'},
      ]
    },
    privacy:{
      url:environment.api_url + '/privacy/',
      methods:[
        {name: 'list', type:'get', url:'privacy-page-details'},
      ]
    },
    site_map:{
      url:environment.api_url + '/site-map/',
      methods:[
        {name: 'list', type:'get', url:'site-map-page-details'},
      ]
    },
    terms:{
      url:environment.api_url + '/terms/',
      methods:[
        {name: 'list', type:'get', url:'terms-page-details'},
      ]
    },
    capture_enquiry:{
      url:environment.api_url + '/capture/',
      methods:[
        {name: 'create', type:'post', url:'enquiry'},
      ]
    },
    footer:{
      url:environment.api_url + '/footer/',
      methods:[
        {name: 'list', type:'get', url:'footer-details'},
      ]
    },
    
  }

}
