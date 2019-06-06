import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes, RouterModule } from '@angular/router';
import { PagesModule } from '../pages.module';
import { NewComponent } from './new.component';

const routes: Routes = [{ path: '', component: NewComponent }];
@NgModule({
    declarations: [NewComponent],
    imports: [
        CommonModule,
        RouterModule.forChild(routes),
        PagesModule,
    ]
})
export class NewModule { }
