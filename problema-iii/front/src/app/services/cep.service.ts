import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { IUser } from '../models/user.model';
import { environment } from 'src/environments/environment.prod';
import { ICEP } from '../models/cep.model';

@Injectable({
  providedIn: 'root'
})
export class CEPService {
  constructor(private http: HttpClient) { }

  public buscarCEP(cep: number): Observable<ICEP> {
    return this.http.get<ICEP>(environment.url + cep.toString() + '/json');
  }

  public list(): Observable<any> {
    return this.http.get<any>(environment.api + 'base_cep');
  }

  public add(cep: ICEP): Observable<ICEP> {
    return this.http.post<ICEP>(environment.api + 'base_cep', cep);
  }

}
