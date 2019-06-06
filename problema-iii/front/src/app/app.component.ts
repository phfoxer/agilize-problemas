import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  public isLogged: boolean;
  constructor(private router: Router) {
    this.isLogged = (localStorage.getItem('user')) ? true : false;
  }

  public logout(): void {
    localStorage.clear();
    this.isLogged = false;
    this.router.navigate(['/']);
  }
}
