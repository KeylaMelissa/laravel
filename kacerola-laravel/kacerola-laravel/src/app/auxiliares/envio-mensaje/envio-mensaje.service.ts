import { Injectable } from '@angular/core';
import { VariablesGlobales } from '../../common/variables-globales';
import { Observable, throwError } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { map, catchError } from 'rxjs/operators';
import { EnvioMensaje } from './envio-mensaje';

@Injectable({
  providedIn: 'root'
})
export class EnvioMensajeService {

  private urlEndPoint: string = 'api/envio_mensaje';

  constructor(private http: HttpClient) { }

  create(envioMensaje: EnvioMensaje): Observable<EnvioMensaje> {
    return this.http.post(this.urlEndPoint, envioMensaje).pipe(
      map((response: any) => response.envioMensaje as EnvioMensaje),
      catchError(e => {
        if (e.status==400){
          return throwError(e);
        }

        if (e.error.mensaje) {
          console.error(e.error.mensaje);
        }

        return throwError(e);
      })
    )
  }
}
