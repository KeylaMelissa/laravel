import { Injectable } from '@angular/core';
import { VariablesGlobales } from 'src/app/common/variables-globales';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { HorarioAtencion } from './horario-atencion';

@Injectable({
  providedIn: 'root'
})
export class HorarioAtencionService {
  private urlEndPoint: string = VariablesGlobales.apiURL + 'api/horario_atencion';

  constructor(private http: HttpClient) { }

  getListado(): Observable<HorarioAtencion[]> {
    return this.http.get<HorarioAtencion[]>(`${this.urlEndPoint}/listado`);
  }
}
