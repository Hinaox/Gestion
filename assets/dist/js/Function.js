  // ---------------------------------------------------function utilises par le template------------------------
  // ------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------
      // when a node is double-clicked, add a child to it
      function nodeDoubleClick(e, obj) {
        var clicked = obj.part;
        if (clicked !== null) {
          var thisemp = clicked.data;
          // console.log(thisemp);
          myDiagram.startTransaction("add employee");
          var newemp = {
            name: "(new person)",
            title: "",
            comments: "",
            parent: thisemp.key
          };
          myDiagram.model.addNodeData(newemp);
          myDiagram.commitTransaction("add employee");
        }
      }

      function findHeadShot(key) {
        if (key < 0 || key > 16) return "images/HSnopic.png"; // There are only 16 images on the server
        return "images/HS" + key + ".png"
      }
      // this is used to determine feedback during drags
      function mayWorkFor(node1, node2) {
        if (!(node1 instanceof go.Node)) return false;  // must be a Node
        if (node1 === node2) return false;  // cannot work for yourself
        if (node2.isInTreeOf(node1)) return false;  // cannot work for someone who works for you
        return true;
      }
      function textStyle() {
        return { font: "9pt  Segoe UI,sans-serif", stroke: "white" };
      }
      //--------------------------------------------------- TreeLayoutFunction--------------------
//--------------------------------------------------- TreeLayoutFunction--------------------
//--------------------------------------------------- TreeLayoutFunction--------------------
//--------------------------------------------------- TreeLayoutFunction--------------------
      

      function TreeLayoutCommits(){
        go.TreeLayout.prototype.commitLinks.call(this);
        // make sure the middle segment of an orthogonal link does not cross over the assistant subtree
        var eit = this.network.edges.iterator;
        while (eit.next()) {
          var e = eit.value;
          if (e.link == null) continue;
          var r = e.link;
          // does this edge come from a substitute parent vertex?
          var subst = e.fromVertex;
          if (subst.node == null && r.routing == go.Link.Orthogonal) {
            r.updateRoute();
            r.startRoute();
            // middle segment goes from point 2 to point 3
            var p1 = subst.center;  // assume artificial vertex has zero size
            var p2 = r.getPoint(2).copy();
            var p3 = r.getPoint(3).copy();
            var p5 = r.getPoint(r.pointsCount - 1);
            var dist = 10;
            if (subst.angle == 270 || subst.angle == 180) dist = -20;
            if (subst.angle == 90 || subst.angle == 270) {
              p2.y = p5.y - dist; // (p1.y+p5.y)/2;
              p3.y = p5.y - dist; // (p1.y+p5.y)/2;
            } else {
              p2.x = p5.x - dist; // (p1.x+p5.x)/2;
              p3.x = p5.x - dist; // (p1.x+p5.x)/2;
            }
            r.setPoint(2, p2);
            r.setPoint(3, p3);
            r.commitRoute();
          }
        }
      }


      function showEmployeeInfo(e, obj) {
        // remove the whole subtree, including the node itself
        var clicked = obj.part;
        if (clicked !== null) {
          var thisemp = clicked.data;
          // console.log(thisemp);
          // console.log(thisemp.name);
         

         document.getElementById("nomEmploye").innerHTML =thisemp.name;
        document.getElementById("posteEmploye").innerHTML =thisemp.title;
        // console.log(thisemp.Categorie);
       
        document.getElementById("CategorieEmp").innerHTML =thisemp.Categorie;

           document.getElementById("staff-img").src="images/HS"+thisemp.ID+".png";
         
        }
        var x = document.getElementById("EmployeInfo");
        // if (x.style.display === "none") {
          x.style.display = "block";
         x.style.width="350px";
          document.getElementById("myDiagramDiv").style.width ="1000px";
        // } 
      }
      function AppelOffre(){
        var poste=document.getElementById("posteEmploye").innerHTML;
        var categEmploye= document.getElementById("CategorieEmp").innerHTML ;
        document.getElementById("FormCategorieEmp").value=categEmploye;
        document.getElementById("FormPost").value=poste;
      }




      if (window.Inspector) myInspector = new Inspector("myInspector", myDiagram,
        {
          properties: {
            "key": { readOnly: true },
            "comments": {},
            "isAssistant": { type: "boolean" }
          },
          propertyModified: function(name, val) {
            if (name === "isAssistant") myDiagram.layout.invalidateLayout();
          }
        });