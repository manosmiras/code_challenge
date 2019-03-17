import { Component, Input, Output, EventEmitter } from '@angular/core';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
import { PolicyService } from '../policy.service';
import { CustomerService } from '../customer.service';
import { InsurerService } from '../insurer.service';
import { PolicyTypeService } from '../policy-type.service';
import { Observable} from 'rxjs';
import { Policy } from '../policy';
import { Customer } from '../customer';
import { Insurer } from '../insurer';
import { PolicyType } from '../policy-type';
 
@Component({
    selector: 'app-create-policy',
    templateUrl: './create-policy.component.html',
    styleUrls: ['./create-policy.component.css'],
    providers: [PolicyService, CustomerService, InsurerService, PolicyTypeService]
})
 
// component for creating a policy record
export class CreatePolicyComponent {
 
    // our angular form
    create_policy_form: FormGroup;
 
    // @Output will tell the parent component (AppComponent) that an event happened in this component
    @Output() show_read_policies_event = new EventEmitter();
 
    customers: Customer[];
	insurers: Insurer[];
	policy_types: PolicyType[];
 
    // initialize 'policy service', 'customer service' and 'form builder'
    constructor(
        private policyService: PolicyService,
        private customerService: CustomerService,
		private insurerService: InsurerService,
		private policyTypeService: PolicyTypeService,
        formBuilder: FormBuilder
    ){
        // based on our html form, build our angular form
        this.create_policy_form = formBuilder.group({
            premium: ["", Validators.required],
			customer_id: ["", Validators.required],
			insurer_id: ["", Validators.required],
			policy_type_id: ["", Validators.required]
			
        });
    }
 
    // user clicks 'create' button
    createPolicy(){
		
		console.log(this.create_policy_form);
		
        // send data to server
        this.policyService.createPolicy(this.create_policy_form.value)
            .subscribe(
                 policy => {
                    // show an alert to tell the user if policy was created or not
                    console.log(policy);
 
                    // go back to list of policies
                    this.readPolicies();
                 },
                 error => console.log(error)
             );
    }
 
    // user clicks the 'read policies' button
    readPolicies(){
        this.show_read_policies_event.emit({ title: "Read Policies" });
    }
 
    // what to do when this component were initialized
    ngOnInit(){
        // read customers from database
        this.customerService.readCustomers()
            .subscribe(customers => this.customers=customers['customers']);
		// read insurers from database
        this.insurerService.readInsurers()
            .subscribe(insurers => this.insurers=insurers['insurers']);
		// read policy types from database
        this.policyTypeService.readPolicyTypes()
            .subscribe(policy_types => this.policy_types=policy_types['policy_types']);
    }
}