import { Routes } from '@angular/router';
import { CardComponent } from "./card/card.component";

export const routes: Routes = [
  { path: '', redirectTo: '/card-game', pathMatch: 'full' },
  { path: 'card-game', component: CardComponent },
  { path: '**', redirectTo: '/card-game' }
];
