import { Injectable } from '@angular/core';
import { VariablesGlobales } from '../../common/variables-globales';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';
import { FotoWeb } from './foto-web';

@Injectable({
  providedIn: 'root'
})
export class FotoWebService {

  private urlEndPoint: string = 'api/foto_web';

  constructor(private http: HttpClient, private router: Router) { }

  getFotoWeb(id: number): Observable<FotoWeb> {
    return this.http.get<FotoWeb>(`${this.urlEndPoint}/${id}`).pipe(
      catchError(e => {
        if (e.status != 401 && e.error.mensaje) {
          this.router.navigate(['/']);
          console.error(e.error.mensaje);
        }

        return throwError(e);
      })
    );
  }
}
