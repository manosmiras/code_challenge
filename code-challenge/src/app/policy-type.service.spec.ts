import { TestBed } from '@angular/core/testing';

import { PolicyTypeService } from './policy-type.service';

describe('PolicyTypeService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: PolicyTypeService = TestBed.get(PolicyTypeService);
    expect(service).toBeTruthy();
  });
});
