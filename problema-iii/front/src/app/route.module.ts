import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthGuard } from './Guard.service';

const route: Routes = [
    {
        path: '',
        loadChildren: './pages/login/login.module#LoginModule'
    },
    {
        path: 'page',
        canActivateChild: [AuthGuard],
        children: [
            {
                path: 'list',
                loadChildren: './pages/list/list.module#ListModule',
                data: { state: 'list' }
            },
            {
                path: 'home',
                loadChildren: './pages/new/new.module#NewModule',
                data: { state: 'new' }
            }
        ]
    }

];

@NgModule({
    imports: [RouterModule.forRoot(route)],
    exports: [RouterModule]
})
export class AppRoutingModule { }
export const routedComponents = [
    // NotFoundComponent
];
