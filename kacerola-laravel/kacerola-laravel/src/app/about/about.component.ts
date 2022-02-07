import { Component, OnInit } from '@angular/core';
import { VariablesGlobales } from '../common/variables-globales';
import { FotoWebService } from '../auxiliares/foto-web/foto-web.service';

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.css']
})
export class AboutComponent implements OnInit {

  about: string = VariablesGlobales.apiURL + 'api/foto_web/foto/';
  banner: string = VariablesGlobales.apiURL + 'api/foto_web/foto/';
  constructor(private fotoWebService: FotoWebService) { }

  ngOnInit(): void {
    this.fotoWebService.getFotoWeb(2).subscribe(fot => this.about = this.about + fot.foto);
    this.fotoWebService.getFotoWeb(3).subscribe(fot => this.banner = this.banner + fot.foto);
  }

}
