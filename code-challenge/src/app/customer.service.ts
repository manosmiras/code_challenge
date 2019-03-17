import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable} from 'rxjs';
import { map } from 'rxjs/operators';
import { catchError } from 'rxjs/operators';
import { Customer } from './customer';
 
@Injectable()
 
// Service for customers data.
export class CustomerService {
 
    // We need Http to talk to a remote server.
    constructor(private _http: Http) { }
 
    // Get list of customers from database via api.
    readCustomers(): Observable<Customer[]>{
        return this._http
            .get("http://localhost/code_challenge/api/customers.php")
            .pipe(map((res: Response) => res.json()));
    }
 
}