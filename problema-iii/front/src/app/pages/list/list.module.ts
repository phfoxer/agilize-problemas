import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes, RouterModule } from '@angular/router';
import { PagesModule } from '../pages.module';
import { ListComponent } from './list.component';

const routes: Routes = [{ path: '', component: ListComponent }];
@NgModule({
    declarations: [ListComponent],
    imports: [
        CommonModule,
        RouterModule.forChild(routes),
        PagesModule,
    ]
})
export class ListModule { }
