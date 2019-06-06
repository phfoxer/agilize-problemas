import { Injectable } from '@angular/core';
import { CanActivateChild } from '@angular/router';
@Injectable()
export class AuthGuard implements CanActivateChild {
    constructor() { }
    canActivateChild(): Promise<boolean> {
        return new Promise((resolve, reject) => {
            const user = localStorage.getItem('user') ? JSON.parse(localStorage.getItem('user')) : { token: null };
            if (user.token) {
                resolve(true);
            } else {
                reject(false);
            }
        });
    }
}
