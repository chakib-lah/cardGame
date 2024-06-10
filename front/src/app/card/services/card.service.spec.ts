import { TestBed } from '@angular/core/testing';

import { CardService } from './card.service';
import {HttpClientTestingModule, HttpTestingController} from "@angular/common/http/testing";

describe('CardService', () => {
  let service: CardService;
  let httpMock: HttpTestingController;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [HttpClientTestingModule],
      providers: [CardService]
    });

    service = TestBed.inject(CardService);
    httpMock = TestBed.inject(HttpTestingController);
  });

  afterEach(() => {
    httpMock.verify()
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });

  it('should fetch game state from API', () => {
    const mockCardState = {
      randomHand: [
        { color: 'Carreaux', value: 'As' },
      ],
      sortedHand: [
        { color: 'Carreaux', value: 'As' },
      ],
      colorOrder: ['Carreaux', 'Coeur', 'Pique', 'Trèfle'],
      valueOrder: ['As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Valet', 'Dame', 'Roi']
    };

    service.getCardState().subscribe((data) => {
      expect(data).toEqual(mockCardState);
    });

    const req = httpMock.expectOne('https://localhost:8000/api/card/game');
    expect(req.request.method).toBe('GET');
    req.flush(mockCardState);
  });
});
