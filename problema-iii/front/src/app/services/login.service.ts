import { Injectable } from '@angular/core';
import { HttpClient, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';
import { IUser } from '../models/user.model';
import { environment } from 'src/environments/environment.prod';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  constructor(private http: HttpClient) { }

  public auth(user: IUser): Observable<any> {
    const env = environment;
    let params: HttpParams = new HttpParams();
    params = params.append('email', user.email);
    params = params.append('password', user.password);
    return this.http.post(env.api + 'login', user);
  }

}
