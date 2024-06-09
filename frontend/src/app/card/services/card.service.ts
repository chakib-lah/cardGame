import { Injectable } from '@angular/core';
import { HttpClient } from "@angular/common/http";
import { Observable } from "rxjs";
import { environment } from "../../../environments/environment";

@Injectable({
  providedIn: 'root'
})
export class CardService {

  private apiUrl = `${environment.apiUrl}/card/game`;

  constructor(private http: HttpClient) { }

  getCardState(): Observable<any> {
    return this.http.get(this.apiUrl);
  }
}
