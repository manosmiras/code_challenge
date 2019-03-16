import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpModule } from '@angular/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ReadPoliciesComponent } from './read-policies/read-policies.component';

@NgModule({
  declarations: [
    AppComponent,
    ReadPoliciesComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
	HttpModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
