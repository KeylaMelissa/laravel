import { Component, OnInit } from '@angular/core';
import { EmpresaService } from '../maestros/empresa/empresa.service';
import { Empresa } from '../maestros/empresa/empresa';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.css']
})
export class FooterComponent implements OnInit {
  empresa: Empresa;

  constructor(private empresaService: EmpresaService) { }

  ngOnInit(): void {
    this.empresaService.getEmpresa(1).subscribe(emp => {
      this.empresa = emp;
    });
  }
}
