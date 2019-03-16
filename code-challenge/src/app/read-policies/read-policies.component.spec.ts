import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ReadPoliciesComponent } from './read-policies.component';

describe('ReadPoliciesComponent', () => {
  let component: ReadPoliciesComponent;
  let fixture: ComponentFixture<ReadPoliciesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ReadPoliciesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ReadPoliciesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
