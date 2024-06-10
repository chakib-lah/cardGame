import { Injectable } from '@angular/core';
import {Observable} from "rxjs";
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class CardService {

  private apiUrl = 'https://localhost:8000/api/card/game';

  constructor(private http: HttpClient) { }

  getCardState(): Observable<any> {
    return this.http.get(this.apiUrl);
  }
}
