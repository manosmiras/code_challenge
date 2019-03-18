import { Injectable } from '@angular/core';
import { Http, Response, Headers, RequestOptions } from '@angular/http';
import { Observable} from 'rxjs';
import { catchError } from 'rxjs/operators';
import { Policy } from './policy';
import { map } from 'rxjs/operators';
 
@Injectable()
 
// Service for policy data.
export class PolicyService {
 
    // Need Http to talk to a remote server.
    constructor(private _http : Http){ }
 
    // Get list of policies from remote server.
    readPolicies(): Observable<Policy[]>{
 
        return this._http
            .get("http://localhost/code_challenge/api/policies.php")
            .pipe(map((res: Response) => res.json()));
    }
	
	// Send policy data to remote server to create it.
	createPolicy(policy): Observable<Policy>{
		console.log("policy");
		console.log(policy);
		let headers = new Headers({ 'Content-Type': 'text/plain'});
		let options = new RequestOptions({ headers: headers });
		console.log(options);
		return this._http.post(
			"http://localhost/code_challenge/api/policies.php",
			policy,
			options
		).pipe(map((res: Response) => res.json()));
	}
	 
}