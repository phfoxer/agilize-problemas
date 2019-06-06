import { Component, OnInit } from '@angular/core';
import { IUser } from 'src/app/models/user.model';
import { LoginService } from 'src/app/services/login.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
  providers: [LoginService]
})
export class LoginComponent implements OnInit {
  public user: IUser;
  constructor(private loginService: LoginService, public router: Router) { }

  ngOnInit() {
    this.user = {
      email: 'adriano@agilize.com.br',
      password: '123456'
    };

    if (localStorage.getItem('user')) {
      this.router.navigate(['/page/home']);
    }
    this.router.navigate(['/page/home']);
  }

  onSubmit() {
    this.loginService.auth(this.user).subscribe(result => {
      localStorage.setItem('user', JSON.stringify(result));
      this.router.navigate(['/page/home']);
    });

  }
}
