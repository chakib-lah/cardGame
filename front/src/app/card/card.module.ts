import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CardRoutingModule } from './card-routing.module';
import { CardComponent } from "./card.component";
import {MatCard} from "@angular/material/card";
import {MatButton} from "@angular/material/button";


@NgModule({
  declarations: [CardComponent],
  imports: [
    CommonModule,
    CardRoutingModule,
    MatCard,
    MatButton
  ]
})
export class CardModule { }
