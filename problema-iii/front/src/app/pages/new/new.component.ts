import { Component, OnInit } from '@angular/core';
import { CEPService } from 'src/app/services/cep.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-new',
  templateUrl: './new.component.html',
  styleUrls: ['./new.component.css'],
  providers: [CEPService]
})
export class NewComponent implements OnInit {
  cep: number;
  constructor(private cepService: CEPService, private router: Router) { }

  ngOnInit() {

  }

  consultar(): void {
    this.cepService.buscarCEP(this.cep).subscribe(result => {
      this.cepService.add(result).subscribe(() => {
        this.router.navigate(['/page/list']);
      });
    });
  }

}
