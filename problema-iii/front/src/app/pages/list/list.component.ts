import { Component, OnInit } from '@angular/core';
import { ICEP } from 'src/app/models/cep.model';
import { CEPService } from 'src/app/services/cep.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css'],
  providers: [CEPService]
})
export class ListComponent implements OnInit {
  public items: ICEP[] = [];
  constructor(private cepService: CEPService) { }

  ngOnInit() {
    this.cepService.list().subscribe(items => this.items = (items && items.data) ? items.data : []);
  }

}
