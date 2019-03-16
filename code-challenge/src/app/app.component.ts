import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
    // properties for child components
    title="Read Policies";
    policy_id;
 
    // properties used to identify what views to show
    show_read_policies_html=true;
}