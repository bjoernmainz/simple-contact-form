﻿//var image = 14;for(i=2;i<102; i++){    if(i%2 == 0) {        captchas(i);    }}for(i=100;i<1000; i++){    if(i%100 == 0) {        captchas(i);    }}function captchas(image) {    // =======================================================var idOpn = charIDToTypeID( "Opn " );    var desc1 = new ActionDescriptor();    var idnull = charIDToTypeID( "null" );    desc1.putPath( idnull, new File( "/Users/tk/Desktop/captcha/template/vorlage.psd" ) );    var idAs = charIDToTypeID( "As  " );        var desc2 = new ActionDescriptor();        var idmaximizeCompatibility = stringIDToTypeID( "maximizeCompatibility" );        desc2.putBoolean( idmaximizeCompatibility, false );    var idPhtthree = charIDToTypeID( "Pht3" );    desc1.putObject( idAs, idPhtthree, desc2 );executeAction( idOpn, desc1, DialogModes.NO );// =======================================================var idslct = charIDToTypeID( "slct" );    var desc3 = new ActionDescriptor();    var idnull = charIDToTypeID( "null" );        var ref1 = new ActionReference();        var idtypeCreateOrEditTool = stringIDToTypeID( "typeCreateOrEditTool" );        ref1.putClass( idtypeCreateOrEditTool );    desc3.putReference( idnull, ref1 );    var iddontRecord = stringIDToTypeID( "dontRecord" );    desc3.putBoolean( iddontRecord, true );    var idforceNotify = stringIDToTypeID( "forceNotify" );    desc3.putBoolean( idforceNotify, true );executeAction( idslct, desc3, DialogModes.NO );// =======================================================var idsetd = charIDToTypeID( "setd" );    var desc4 = new ActionDescriptor();    var idnull = charIDToTypeID( "null" );        var ref2 = new ActionReference();        var idTxLr = charIDToTypeID( "TxLr" );        var idOrdn = charIDToTypeID( "Ordn" );        var idTrgt = charIDToTypeID( "Trgt" );        ref2.putEnumerated( idTxLr, idOrdn, idTrgt );    desc4.putReference( idnull, ref2 );    var idT = charIDToTypeID( "T   " );        var desc5 = new ActionDescriptor();        var idTxt = charIDToTypeID( "Txt " );        desc5.putString( idTxt, image );        var idwarp = stringIDToTypeID( "warp" );            var desc6 = new ActionDescriptor();            var idwarpStyle = stringIDToTypeID( "warpStyle" );            var idwarpStyle = stringIDToTypeID( "warpStyle" );            var idwarpNone = stringIDToTypeID( "warpNone" );            desc6.putEnumerated( idwarpStyle, idwarpStyle, idwarpNone );            var idwarpValue = stringIDToTypeID( "warpValue" );            desc6.putDouble( idwarpValue, 0.000000 );            var idwarpPerspective = stringIDToTypeID( "warpPerspective" );            desc6.putDouble( idwarpPerspective, 0.000000 );            var idwarpPerspectiveOther = stringIDToTypeID( "warpPerspectiveOther" );            desc6.putDouble( idwarpPerspectiveOther, 0.000000 );            var idwarpRotate = stringIDToTypeID( "warpRotate" );            var idOrnt = charIDToTypeID( "Ornt" );            var idHrzn = charIDToTypeID( "Hrzn" );            desc6.putEnumerated( idwarpRotate, idOrnt, idHrzn );        var idwarp = stringIDToTypeID( "warp" );        desc5.putObject( idwarp, idwarp, desc6 );        var idtextGridding = stringIDToTypeID( "textGridding" );        var idtextGridding = stringIDToTypeID( "textGridding" );        var idNone = charIDToTypeID( "None" );        desc5.putEnumerated( idtextGridding, idtextGridding, idNone );        var idOrnt = charIDToTypeID( "Ornt" );        var idOrnt = charIDToTypeID( "Ornt" );        var idHrzn = charIDToTypeID( "Hrzn" );        desc5.putEnumerated( idOrnt, idOrnt, idHrzn );        var idAntA = charIDToTypeID( "AntA" );        var idAnnt = charIDToTypeID( "Annt" );        var idAnSt = charIDToTypeID( "AnSt" );        desc5.putEnumerated( idAntA, idAnnt, idAnSt );        var idbounds = stringIDToTypeID( "bounds" );            var desc7 = new ActionDescriptor();            var idLeft = charIDToTypeID( "Left" );            var idPnt = charIDToTypeID( "#Pnt" );            desc7.putUnitDouble( idLeft, idPnt, -13.903793 );            var idTop = charIDToTypeID( "Top " );            var idPnt = charIDToTypeID( "#Pnt" );            desc7.putUnitDouble( idTop, idPnt, -21.453850 );            var idRght = charIDToTypeID( "Rght" );            var idPnt = charIDToTypeID( "#Pnt" );            desc7.putUnitDouble( idRght, idPnt, 13.903793 );            var idBtom = charIDToTypeID( "Btom" );            var idPnt = charIDToTypeID( "#Pnt" );            desc7.putUnitDouble( idBtom, idPnt, 8.117673 );        var idbounds = stringIDToTypeID( "bounds" );        desc5.putObject( idbounds, idbounds, desc7 );        var idboundingBox = stringIDToTypeID( "boundingBox" );            var desc8 = new ActionDescriptor();            var idLeft = charIDToTypeID( "Left" );            var idPnt = charIDToTypeID( "#Pnt" );            desc8.putUnitDouble( idLeft, idPnt, -11.903793 );            var idTop = charIDToTypeID( "Top " );            var idPnt = charIDToTypeID( "#Pnt" );            desc8.putUnitDouble( idTop, idPnt, -18.000000 );            var idRght = charIDToTypeID( "Rght" );            var idPnt = charIDToTypeID( "#Pnt" );            desc8.putUnitDouble( idRght, idPnt, 13.000000 );            var idBtom = charIDToTypeID( "Btom" );            var idPnt = charIDToTypeID( "#Pnt" );            desc8.putUnitDouble( idBtom, idPnt, 0.000000 );        var idboundingBox = stringIDToTypeID( "boundingBox" );        desc5.putObject( idboundingBox, idboundingBox, desc8 );        var idtextShape = stringIDToTypeID( "textShape" );            var list1 = new ActionList();                var desc9 = new ActionDescriptor();                var idTEXT = charIDToTypeID( "TEXT" );                var idTEXT = charIDToTypeID( "TEXT" );                var idPnt = charIDToTypeID( "Pnt " );                desc9.putEnumerated( idTEXT, idTEXT, idPnt );                var idOrnt = charIDToTypeID( "Ornt" );                var idOrnt = charIDToTypeID( "Ornt" );                var idHrzn = charIDToTypeID( "Hrzn" );                desc9.putEnumerated( idOrnt, idOrnt, idHrzn );                var idTrnf = charIDToTypeID( "Trnf" );                    var desc10 = new ActionDescriptor();                    var idxx = stringIDToTypeID( "xx" );                    desc10.putDouble( idxx, 1.000000 );                    var idxy = stringIDToTypeID( "xy" );                    desc10.putDouble( idxy, 0.000000 );                    var idyx = stringIDToTypeID( "yx" );                    desc10.putDouble( idyx, 0.000000 );                    var idyy = stringIDToTypeID( "yy" );                    desc10.putDouble( idyy, 1.000000 );                    var idtx = stringIDToTypeID( "tx" );                    desc10.putDouble( idtx, 0.000000 );                    var idty = stringIDToTypeID( "ty" );                    desc10.putDouble( idty, 0.000000 );                var idTrnf = charIDToTypeID( "Trnf" );                desc9.putObject( idTrnf, idTrnf, desc10 );                var idrowCount = stringIDToTypeID( "rowCount" );                desc9.putInteger( idrowCount, 1 );                var idcolumnCount = stringIDToTypeID( "columnCount" );                desc9.putInteger( idcolumnCount, 1 );                var idrowMajorOrder = stringIDToTypeID( "rowMajorOrder" );                desc9.putBoolean( idrowMajorOrder, true );                var idrowGutter = stringIDToTypeID( "rowGutter" );                var idPnt = charIDToTypeID( "#Pnt" );                desc9.putUnitDouble( idrowGutter, idPnt, 0.000000 );                var idcolumnGutter = stringIDToTypeID( "columnGutter" );                var idPnt = charIDToTypeID( "#Pnt" );                desc9.putUnitDouble( idcolumnGutter, idPnt, 0.000000 );                var idSpcn = charIDToTypeID( "Spcn" );                var idPnt = charIDToTypeID( "#Pnt" );                desc9.putUnitDouble( idSpcn, idPnt, 0.000000 );                var idframeBaselineAlignment = stringIDToTypeID( "frameBaselineAlignment" );                var idframeBaselineAlignment = stringIDToTypeID( "frameBaselineAlignment" );                var idalignByAscent = stringIDToTypeID( "alignByAscent" );                desc9.putEnumerated( idframeBaselineAlignment, idframeBaselineAlignment, idalignByAscent );                var idfirstBaselineMinimum = stringIDToTypeID( "firstBaselineMinimum" );                var idPnt = charIDToTypeID( "#Pnt" );                desc9.putUnitDouble( idfirstBaselineMinimum, idPnt, 0.000000 );                var idbase = stringIDToTypeID( "base" );                    var desc11 = new ActionDescriptor();                    var idHrzn = charIDToTypeID( "Hrzn" );                    desc11.putDouble( idHrzn, 0.000000 );                    var idVrtc = charIDToTypeID( "Vrtc" );                    desc11.putDouble( idVrtc, 0.000000 );                var idPnt = charIDToTypeID( "Pnt " );                desc9.putObject( idbase, idPnt, desc11 );            var idtextShape = stringIDToTypeID( "textShape" );            list1.putObject( idtextShape, desc9 );        desc5.putList( idtextShape, list1 );        var idTxtt = charIDToTypeID( "Txtt" );            var list2 = new ActionList();                var desc12 = new ActionDescriptor();                var idFrom = charIDToTypeID( "From" );                desc12.putInteger( idFrom, 0 );                var idT = charIDToTypeID( "T   " );                desc12.putInteger( idT, 3 );                var idTxtS = charIDToTypeID( "TxtS" );                    var desc13 = new ActionDescriptor();                    var idstyleSheetHasParent = stringIDToTypeID( "styleSheetHasParent" );                    desc13.putBoolean( idstyleSheetHasParent, true );                    var idfontPostScriptName = stringIDToTypeID( "fontPostScriptName" );                    desc13.putString( idfontPostScriptName, """ArialMT""" );                    var idFntN = charIDToTypeID( "FntN" );                    desc13.putString( idFntN, """Arial""" );                    var idFntS = charIDToTypeID( "FntS" );                    desc13.putString( idFntS, """Regular""" );                    var idScrp = charIDToTypeID( "Scrp" );                    desc13.putInteger( idScrp, 0 );                    var idFntT = charIDToTypeID( "FntT" );                    desc13.putInteger( idFntT, 1 );                    var idSz = charIDToTypeID( "Sz  " );                    var idPnt = charIDToTypeID( "#Pnt" );                    desc13.putUnitDouble( idSz, idPnt, 24.999990 );                    var idautoLeading = stringIDToTypeID( "autoLeading" );                    desc13.putBoolean( idautoLeading, false );                    var idLdng = charIDToTypeID( "Ldng" );                    var idPnt = charIDToTypeID( "#Pnt" );                    desc13.putUnitDouble( idLdng, idPnt, 30.999990 );                    var iddigitSet = stringIDToTypeID( "digitSet" );                    var iddigitSet = stringIDToTypeID( "digitSet" );                    var iddefaultDigits = stringIDToTypeID( "defaultDigits" );                    desc13.putEnumerated( iddigitSet, iddigitSet, iddefaultDigits );                    var idmarkYDistFromBaseline = stringIDToTypeID( "markYDistFromBaseline" );                    var idPnt = charIDToTypeID( "#Pnt" );                    desc13.putUnitDouble( idmarkYDistFromBaseline, idPnt, 0.046660 );                var idTxtS = charIDToTypeID( "TxtS" );                desc12.putObject( idTxtS, idTxtS, desc13 );            var idTxtt = charIDToTypeID( "Txtt" );            list2.putObject( idTxtt, desc12 );        desc5.putList( idTxtt, list2 );        var idparagraphStyleRange = stringIDToTypeID( "paragraphStyleRange" );            var list3 = new ActionList();                var desc14 = new ActionDescriptor();                var idFrom = charIDToTypeID( "From" );                desc14.putInteger( idFrom, 0 );                var idT = charIDToTypeID( "T   " );                desc14.putInteger( idT, 3 );                var idparagraphStyle = stringIDToTypeID( "paragraphStyle" );                    var desc15 = new ActionDescriptor();                    var idstyleSheetHasParent = stringIDToTypeID( "styleSheetHasParent" );                    desc15.putBoolean( idstyleSheetHasParent, true );                    var idAlgn = charIDToTypeID( "Algn" );                    var idAlg = charIDToTypeID( "Alg " );                    var idCntr = charIDToTypeID( "Cntr" );                    desc15.putEnumerated( idAlgn, idAlg, idCntr );                    var idhyphenate = stringIDToTypeID( "hyphenate" );                    desc15.putBoolean( idhyphenate, true );                    var idhyphenateWordSize = stringIDToTypeID( "hyphenateWordSize" );                    desc15.putInteger( idhyphenateWordSize, 8 );                    var idhyphenatePreLength = stringIDToTypeID( "hyphenatePreLength" );                    desc15.putInteger( idhyphenatePreLength, 3 );                    var idhyphenatePostLength = stringIDToTypeID( "hyphenatePostLength" );                    desc15.putInteger( idhyphenatePostLength, 3 );                    var idhyphenateLimit = stringIDToTypeID( "hyphenateLimit" );                    desc15.putInteger( idhyphenateLimit, 2 );                    var idhyphenationZone = stringIDToTypeID( "hyphenationZone" );                    desc15.putDouble( idhyphenationZone, 36.000000 );                    var idhyphenateCapitalized = stringIDToTypeID( "hyphenateCapitalized" );                    desc15.putBoolean( idhyphenateCapitalized, true );                var idparagraphStyle = stringIDToTypeID( "paragraphStyle" );                desc14.putObject( idparagraphStyle, idparagraphStyle, desc15 );            var idparagraphStyleRange = stringIDToTypeID( "paragraphStyleRange" );            list3.putObject( idparagraphStyleRange, desc14 );        desc5.putList( idparagraphStyleRange, list3 );        var idkerningRange = stringIDToTypeID( "kerningRange" );            var list4 = new ActionList();        desc5.putList( idkerningRange, list4 );    var idTxLr = charIDToTypeID( "TxLr" );    desc4.putObject( idT, idTxLr, desc5 );executeAction( idsetd, desc4, DialogModes.NO );// =======================================================var idsave = charIDToTypeID( "save" );    var desc16 = new ActionDescriptor();    var idAs = charIDToTypeID( "As  " );        var desc17 = new ActionDescriptor();        var idmaximizeCompatibility = stringIDToTypeID( "maximizeCompatibility" );        desc17.putBoolean( idmaximizeCompatibility, false );    var idPhtthree = charIDToTypeID( "Pht3" );    desc16.putObject( idAs, idPhtthree, desc17 );    var idIn = charIDToTypeID( "In  " );    desc16.putPath( idIn, new File( "/Users/tk/Desktop/captcha/png/"+image+".psd" ) );    var idDocI = charIDToTypeID( "DocI" );    desc16.putInteger( idDocI, 35 );    var idLwCs = charIDToTypeID( "LwCs" );    desc16.putBoolean( idLwCs, true );    var idsaveStage = stringIDToTypeID( "saveStage" );    var idsaveStageType = stringIDToTypeID( "saveStageType" );    var idsaveBegin = stringIDToTypeID( "saveBegin" );    desc16.putEnumerated( idsaveStage, idsaveStageType, idsaveBegin );executeAction( idsave, desc16, DialogModes.NO );// =======================================================var idsave = charIDToTypeID( "save" );    var desc18 = new ActionDescriptor();    var idAs = charIDToTypeID( "As  " );        var desc19 = new ActionDescriptor();        var idmaximizeCompatibility = stringIDToTypeID( "maximizeCompatibility" );        desc19.putBoolean( idmaximizeCompatibility, false );    var idPhtthree = charIDToTypeID( "Pht3" );    desc18.putObject( idAs, idPhtthree, desc19 );    var idIn = charIDToTypeID( "In  " );    desc18.putPath( idIn, new File( "/Users/tk/Desktop/captcha/png"+image+".psd" ) );    var idDocI = charIDToTypeID( "DocI" );    desc18.putInteger( idDocI, 35 );    var idLwCs = charIDToTypeID( "LwCs" );    desc18.putBoolean( idLwCs, true );    var idsaveStage = stringIDToTypeID( "saveStage" );    var idsaveStageType = stringIDToTypeID( "saveStageType" );    var idsaveSucceeded = stringIDToTypeID( "saveSucceeded" );    desc18.putEnumerated( idsaveStage, idsaveStageType, idsaveSucceeded );executeAction( idsave, desc18, DialogModes.NO );// =======================================================var idExpr = charIDToTypeID( "Expr" );    var desc72 = new ActionDescriptor();    var idUsng = charIDToTypeID( "Usng" );        var desc73 = new ActionDescriptor();        var idOp = charIDToTypeID( "Op  " );        var idSWOp = charIDToTypeID( "SWOp" );        var idOpSa = charIDToTypeID( "OpSa" );        desc73.putEnumerated( idOp, idSWOp, idOpSa );        var idDIDr = charIDToTypeID( "DIDr" );        desc73.putBoolean( idDIDr, true );        var idIn = charIDToTypeID( "In  " );        desc73.putPath( idIn, new File( "/Users/tk/Desktop/captcha/png" ) );        var idFmt = charIDToTypeID( "Fmt " );        var idIRFm = charIDToTypeID( "IRFm" );        var idPNtwofour = charIDToTypeID( "PN24" );        desc73.putEnumerated( idFmt, idIRFm, idPNtwofour );        var idIntr = charIDToTypeID( "Intr" );        desc73.putBoolean( idIntr, false );        var idTrns = charIDToTypeID( "Trns" );        desc73.putBoolean( idTrns, true );        var idMtt = charIDToTypeID( "Mtt " );        desc73.putBoolean( idMtt, true );        var idMttR = charIDToTypeID( "MttR" );        desc73.putInteger( idMttR, 255 );        var idMttG = charIDToTypeID( "MttG" );        desc73.putInteger( idMttG, 255 );        var idMttB = charIDToTypeID( "MttB" );        desc73.putInteger( idMttB, 255 );        var idSHTM = charIDToTypeID( "SHTM" );        desc73.putBoolean( idSHTM, false );        var idSImg = charIDToTypeID( "SImg" );        desc73.putBoolean( idSImg, true );        var idSWsl = charIDToTypeID( "SWsl" );        var idSTsl = charIDToTypeID( "STsl" );        var idSLAl = charIDToTypeID( "SLAl" );        desc73.putEnumerated( idSWsl, idSTsl, idSLAl );        var idSWch = charIDToTypeID( "SWch" );        var idSTch = charIDToTypeID( "STch" );        var idCHsR = charIDToTypeID( "CHsR" );        desc73.putEnumerated( idSWch, idSTch, idCHsR );        var idSWmd = charIDToTypeID( "SWmd" );        var idSTmd = charIDToTypeID( "STmd" );        var idMDCC = charIDToTypeID( "MDCC" );        desc73.putEnumerated( idSWmd, idSTmd, idMDCC );        var idohXH = charIDToTypeID( "ohXH" );        desc73.putBoolean( idohXH, false );        var idohIC = charIDToTypeID( "ohIC" );        desc73.putBoolean( idohIC, true );        var idohAA = charIDToTypeID( "ohAA" );        desc73.putBoolean( idohAA, true );        var idohQA = charIDToTypeID( "ohQA" );        desc73.putBoolean( idohQA, true );        var idohCA = charIDToTypeID( "ohCA" );        desc73.putBoolean( idohCA, false );        var idohIZ = charIDToTypeID( "ohIZ" );        desc73.putBoolean( idohIZ, true );        var idohTC = charIDToTypeID( "ohTC" );        var idSToc = charIDToTypeID( "SToc" );        var idOCzerothree = charIDToTypeID( "OC03" );        desc73.putEnumerated( idohTC, idSToc, idOCzerothree );        var idohAC = charIDToTypeID( "ohAC" );        var idSToc = charIDToTypeID( "SToc" );        var idOCzerothree = charIDToTypeID( "OC03" );        desc73.putEnumerated( idohAC, idSToc, idOCzerothree );        var idohIn = charIDToTypeID( "ohIn" );        desc73.putInteger( idohIn, -1 );        var idohLE = charIDToTypeID( "ohLE" );        var idSTle = charIDToTypeID( "STle" );        var idLEzerothree = charIDToTypeID( "LE03" );        desc73.putEnumerated( idohLE, idSTle, idLEzerothree );        var idohEn = charIDToTypeID( "ohEn" );        var idSTen = charIDToTypeID( "STen" );        var idENzerozero = charIDToTypeID( "EN00" );        desc73.putEnumerated( idohEn, idSTen, idENzerozero );        var idolCS = charIDToTypeID( "olCS" );        desc73.putBoolean( idolCS, false );        var idolEC = charIDToTypeID( "olEC" );        var idSTst = charIDToTypeID( "STst" );        var idSTzerozero = charIDToTypeID( "ST00" );        desc73.putEnumerated( idolEC, idSTst, idSTzerozero );        var idolWH = charIDToTypeID( "olWH" );        var idSTwh = charIDToTypeID( "STwh" );        var idWHzeroone = charIDToTypeID( "WH01" );        desc73.putEnumerated( idolWH, idSTwh, idWHzeroone );        var idolSV = charIDToTypeID( "olSV" );        var idSTsp = charIDToTypeID( "STsp" );        var idSPzerofour = charIDToTypeID( "SP04" );        desc73.putEnumerated( idolSV, idSTsp, idSPzerofour );        var idolSH = charIDToTypeID( "olSH" );        var idSTsp = charIDToTypeID( "STsp" );        var idSPzerofour = charIDToTypeID( "SP04" );        desc73.putEnumerated( idolSH, idSTsp, idSPzerofour );        var idolNC = charIDToTypeID( "olNC" );            var list7 = new ActionList();                var desc74 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCzerozero = charIDToTypeID( "NC00" );                desc74.putEnumerated( idncTp, idSTnc, idNCzerozero );            var idSCnc = charIDToTypeID( "SCnc" );            list7.putObject( idSCnc, desc74 );                var desc75 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNConenine = charIDToTypeID( "NC19" );                desc75.putEnumerated( idncTp, idSTnc, idNConenine );            var idSCnc = charIDToTypeID( "SCnc" );            list7.putObject( idSCnc, desc75 );                var desc76 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCtwoeight = charIDToTypeID( "NC28" );                desc76.putEnumerated( idncTp, idSTnc, idNCtwoeight );            var idSCnc = charIDToTypeID( "SCnc" );            list7.putObject( idSCnc, desc76 );                var desc77 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCtwofour = charIDToTypeID( "NC24" );                desc77.putEnumerated( idncTp, idSTnc, idNCtwofour );            var idSCnc = charIDToTypeID( "SCnc" );            list7.putObject( idSCnc, desc77 );                var desc78 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCtwofour = charIDToTypeID( "NC24" );                desc78.putEnumerated( idncTp, idSTnc, idNCtwofour );            var idSCnc = charIDToTypeID( "SCnc" );            list7.putObject( idSCnc, desc78 );                var desc79 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCtwofour = charIDToTypeID( "NC24" );                desc79.putEnumerated( idncTp, idSTnc, idNCtwofour );            var idSCnc = charIDToTypeID( "SCnc" );            list7.putObject( idSCnc, desc79 );        desc73.putList( idolNC, list7 );        var idobIA = charIDToTypeID( "obIA" );        desc73.putBoolean( idobIA, false );        var idobIP = charIDToTypeID( "obIP" );        desc73.putString( idobIP, """""" );        var idobCS = charIDToTypeID( "obCS" );        var idSTcs = charIDToTypeID( "STcs" );        var idCSzeroone = charIDToTypeID( "CS01" );        desc73.putEnumerated( idobCS, idSTcs, idCSzeroone );        var idovNC = charIDToTypeID( "ovNC" );            var list8 = new ActionList();                var desc80 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCzeroone = charIDToTypeID( "NC01" );                desc80.putEnumerated( idncTp, idSTnc, idNCzeroone );            var idSCnc = charIDToTypeID( "SCnc" );            list8.putObject( idSCnc, desc80 );                var desc81 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCtwozero = charIDToTypeID( "NC20" );                desc81.putEnumerated( idncTp, idSTnc, idNCtwozero );            var idSCnc = charIDToTypeID( "SCnc" );            list8.putObject( idSCnc, desc81 );                var desc82 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCzerotwo = charIDToTypeID( "NC02" );                desc82.putEnumerated( idncTp, idSTnc, idNCzerotwo );            var idSCnc = charIDToTypeID( "SCnc" );            list8.putObject( idSCnc, desc82 );                var desc83 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNConenine = charIDToTypeID( "NC19" );                desc83.putEnumerated( idncTp, idSTnc, idNConenine );            var idSCnc = charIDToTypeID( "SCnc" );            list8.putObject( idSCnc, desc83 );                var desc84 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCzerosix = charIDToTypeID( "NC06" );                desc84.putEnumerated( idncTp, idSTnc, idNCzerosix );            var idSCnc = charIDToTypeID( "SCnc" );            list8.putObject( idSCnc, desc84 );                var desc85 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCtwofour = charIDToTypeID( "NC24" );                desc85.putEnumerated( idncTp, idSTnc, idNCtwofour );            var idSCnc = charIDToTypeID( "SCnc" );            list8.putObject( idSCnc, desc85 );                var desc86 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCtwofour = charIDToTypeID( "NC24" );                desc86.putEnumerated( idncTp, idSTnc, idNCtwofour );            var idSCnc = charIDToTypeID( "SCnc" );            list8.putObject( idSCnc, desc86 );                var desc87 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCtwofour = charIDToTypeID( "NC24" );                desc87.putEnumerated( idncTp, idSTnc, idNCtwofour );            var idSCnc = charIDToTypeID( "SCnc" );            list8.putObject( idSCnc, desc87 );                var desc88 = new ActionDescriptor();                var idncTp = charIDToTypeID( "ncTp" );                var idSTnc = charIDToTypeID( "STnc" );                var idNCtwotwo = charIDToTypeID( "NC22" );                desc88.putEnumerated( idncTp, idSTnc, idNCtwotwo );            var idSCnc = charIDToTypeID( "SCnc" );            list8.putObject( idSCnc, desc88 );        desc73.putList( idovNC, list8 );        var idovCM = charIDToTypeID( "ovCM" );        desc73.putBoolean( idovCM, false );        var idovCW = charIDToTypeID( "ovCW" );        desc73.putBoolean( idovCW, false );        var idovCU = charIDToTypeID( "ovCU" );        desc73.putBoolean( idovCU, true );        var idovSF = charIDToTypeID( "ovSF" );        desc73.putBoolean( idovSF, true );        var idovCB = charIDToTypeID( "ovCB" );        desc73.putBoolean( idovCB, true );        var idovSN = charIDToTypeID( "ovSN" );        desc73.putString( idovSN, """Bilder""" );    var idSaveForWeb = stringIDToTypeID( "SaveForWeb" );    desc72.putObject( idUsng, idSaveForWeb, desc73 );executeAction( idExpr, desc72, DialogModes.NO );// =======================================================var idCls = charIDToTypeID( "Cls " );    var desc89 = new ActionDescriptor();    var idSvng = charIDToTypeID( "Svng" );    var idYsN = charIDToTypeID( "YsN " );    var idN = charIDToTypeID( "N   " );    desc89.putEnumerated( idSvng, idYsN, idN );executeAction( idCls, desc89, DialogModes.NO );}