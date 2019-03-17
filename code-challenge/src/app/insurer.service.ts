import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable} from 'rxjs';
import { map } from 'rxjs/operators';
import { catchError } from 'rxjs/operators';
import { Insurer } from './insurer';
 
@Injectable()
 
// Service for insurers data.
export class InsurerService {
 
    // We need Http to talk to a remote server.
    constructor(private _http: Http) { }
 
    // Get list of insurers from database via api.
    readInsurers(): Observable<Insurer[]>{
        return this._http
            .get("http://localhost/code_challenge/api/insurers.php")
            .pipe(map((res: Response) => res.json()));
    }
 
}