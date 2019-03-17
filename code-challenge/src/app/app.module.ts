import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ReadPoliciesComponent } from './read-policies/read-policies.component';
import { CreatePolicyComponent } from './create-policy/create-policy.component';

@NgModule({
  declarations: [
    AppComponent,
    ReadPoliciesComponent,
    CreatePolicyComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
	HttpModule,
	ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
