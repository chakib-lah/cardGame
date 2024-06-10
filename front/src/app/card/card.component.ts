import { Component, OnDestroy, OnInit } from '@angular/core';
import {Subject, takeUntil} from "rxjs";
import { CardService } from "./services/card.service";
import {MatSnackBar} from "@angular/material/snack-bar";

@Component({
  selector: 'app-card',
  templateUrl: './card.component.html',
  styleUrl: './card.component.scss'
})
export class CardComponent implements OnInit, OnDestroy{

  cardState: any;
  destroy$: Subject<boolean> = new Subject<boolean>();

  constructor(private cardService: CardService, private snackBar: MatSnackBar) { }


  ngOnInit(): void {
    this.generateHand();
  }

  generateHand(): void {
    this.cardService.getCardState()
      .pipe(takeUntil(this.destroy$))
      .subscribe(data => {
      this.cardState = data;
      this.snackBar.open('Nouvelle main générée!', 'Fermer', { duration: 3000 });
    });
  }

  ngOnDestroy(): void {
    this.destroy$.next(true);
    this.destroy$.complete();
  }

}
