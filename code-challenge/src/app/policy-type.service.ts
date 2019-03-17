import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable} from 'rxjs';
import { map } from 'rxjs/operators';
import { catchError } from 'rxjs/operators';
import { PolicyType } from './policy-type';
 
@Injectable()
 
// Service for policy types data.
export class PolicyTypeService {
 
    // We need Http to talk to a remote server.
    constructor(private _http: Http) { }
 
    // Get list of policy types from database via api.
    readPolicyTypes(): Observable<PolicyType[]>{
        return this._http
            .get("http://localhost/code_challenge/api/policy_types.php")
            .pipe(map((res: Response) => res.json()));
    }
 
}