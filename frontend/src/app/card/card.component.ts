import { Component, OnInit } from '@angular/core';
import { CardService } from "./services/card.service";
import { CommonModule } from "@angular/common";

@Component({
  selector: 'app-card',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './card.component.html',
  styleUrl: './card.component.scss'
})
export class CardComponent implements OnInit{
  cardState: any;

  constructor(private cardService: CardService) { }

  ngOnInit(): void {
    this.cardService.getCardState().subscribe(data => {
      this.cardState = data;
    });
  }
}
