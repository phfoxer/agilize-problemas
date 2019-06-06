import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

@NgModule({
    declarations: [],
    imports: [
        CommonModule,
        FormsModule,
        RouterModule,
        HttpClientModule
    ],
    exports: [FormsModule, RouterModule],
    providers: [],
    bootstrap: []
})
export class PagesModule { }
