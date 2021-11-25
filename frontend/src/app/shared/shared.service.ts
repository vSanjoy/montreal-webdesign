import { Injectable } from '@angular/core';
import { Observable, Subject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class SharedService {

  constructor() { }

  private subject = new Subject<any>();
  
  sendClickEvent(itemSection) {
    this.subject.next(itemSection);
  }
  
  getClickEvent(): Observable<any>{ 
    return this.subject.asObservable();
  }

}