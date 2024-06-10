import { Component, OnDestroy, OnInit } from '@angular/core';
import { Subject } from "rxjs";
import { CardService } from "./services/card.service";

@Component({
  selector: 'app-card',
  templateUrl: './card.component.html',
  styleUrl: './card.component.scss'
})
export class CardComponent implements OnInit, OnDestroy{

  cardState: any;
  destroy$: Subject<boolean> = new Subject<boolean>();

  constructor(private cardService: CardService) { }


  ngOnInit(): void {
    this.generateHand();
  }

  generateHand(): void {
    this.cardService.getCardState().subscribe(data => {
      this.cardState = data;
    });
  }

  ngOnDestroy(): void {
    this.destroy$.next(true);
    this.destroy$.complete();
  }

}
