import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { PolicyService } from '../policy.service';
import { Observable} from 'rxjs';
import { Policy } from '../policy';

@Component({
    selector: 'app-read-policies',
    templateUrl: './read-policies.component.html',
    styleUrls: ['./read-policies.component.css'],
    providers: [PolicyService]
})
export class ReadPoliciesComponent implements OnInit {

  // store list of policies
    policies: Policy[];
 
    // initialize policyService to retrieve list policies in the ngOnInit()
    constructor(private policyService: PolicyService){}
 
    // methods that we will use later
    createPolicy(){}
    readOnePolicy(id){}
    updatePolicy(id){}
    deletePolicy(id){}
 
    // Read policies from API.
    ngOnInit(){
        this.policyService.readPolicies()
            .subscribe(policies =>
                this.policies=policies['policies']
            );
    }

}
