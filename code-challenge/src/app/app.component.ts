import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
    // properties for child components
    title="Policies";
    policy_id;
 
    // properties used to identify what views to show
    show_read_policies_html=true;
	show_create_policy_html=false;
	
	// show the 'create product form'
	showCreatePolicy($event){
	 
		// set title
		this.title=$event.title;
	 
		// hide all html then show only one html
		this.hideAll_Html();
		this.show_create_policy_html=true;
	}
	 
	// show products list
	showReadPolicies($event){
		// set title
		this.title=$event.title;
	 
		// hide all html then show only one html
		this.hideAll_Html();
		this.show_read_policies_html=true;
	}
	 
	// hide all html views
	hideAll_Html(){
		this.show_read_policies_html=false;
		this.show_create_policy_html=false;
	}
}