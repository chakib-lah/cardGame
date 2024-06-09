import { ComponentFixture, TestBed } from '@angular/core/testing';
import { CardComponent } from './card.component';
import { CardService } from "./services/card.service";
import { HttpClientTestingModule } from "@angular/common/http/testing";
import { of } from "rxjs";

describe('CardComponent', () => {
  let component: CardComponent;
  let fixture: ComponentFixture<CardComponent>;
  let cardService: CardService;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CardComponent, HttpClientTestingModule],
      providers: [CardService]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CardComponent);
    component = fixture.componentInstance;
    cardService = TestBed.inject(CardService);
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('should fetch card state on init', () => {
    const mockCardState = {
      randomHand: [
        { color: 'Carreaux', value: 'As'}
      ],
      sortedHand: [
        { color: 'Carreaux', value: 'As'}
      ],
      colorOrder: ['Carreaux', 'Coeur', 'Pique', 'Trèfle'],
      valueOrder: ['As', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'Valet', 'Dame', 'Roi']
    };

    spyOn(cardService, 'getCardState').and.returnValue(of(mockCardState));

    fixture.detectChanges();

    expect(component.cardState).toEqual(mockCardState);
  });

  it('should display the random hand', () => {
    const mockCardState = {
      randomHand: [
        { color: 'Carreaux', value: 'As' },
        { color: 'Coeur', value: 'Roi' }
      ],
      sortedHand: [
        { color: 'Carreaux', value: 'As' },
        { color: 'Coeur', value: 'Roi' }
      ],
      colorOrder: ['Carreaux', 'Coeur', 'Pique', 'Trèfle'],
      valueOrder: ['As', 'Roi']
    };

    spyOn(cardService, 'getCardState').and.returnValue(of(mockCardState));

    fixture.detectChanges();

    const compiled = fixture.nativeElement;
    const cardElements = compiled.querySelectorAll('.cards .card');


    expect(cardElements[0].textContent).toContain('Carreaux - As');
    expect(cardElements[1].textContent).toContain('Coeur - Roi');
  });
});

