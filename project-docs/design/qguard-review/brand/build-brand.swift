// Reproduce the existing QGuard CSS mark and Avenir Next lettering as SVG paths.
// macOS: swift -module-cache-path /tmp/qguard-swift-modules build-brand.swift
import Foundation
import CoreText
import CoreGraphics
import ImageIO

let output = URL(fileURLWithPath: #filePath).deletingLastPathComponent()
func n(_ x: CGFloat) -> String { String(format: "%.3f", Double(x)) }
func pathData(_ path: CGPath) -> String {
    var d = ""
    path.applyWithBlock { p in
        let e = p.pointee, v = e.points
        switch e.type {
        case .moveToPoint: d += "M\(n(v[0].x)) \(n(v[0].y))"
        case .addLineToPoint: d += "L\(n(v[0].x)) \(n(v[0].y))"
        case .addQuadCurveToPoint: d += "Q\(n(v[0].x)) \(n(v[0].y)) \(n(v[1].x)) \(n(v[1].y))"
        case .addCurveToPoint: d += "C\(n(v[0].x)) \(n(v[0].y)) \(n(v[1].x)) \(n(v[1].y)) \(n(v[2].x)) \(n(v[2].y))"
        case .closeSubpath: d += "Z"
        @unknown default: break
        }
    }
    return d
}
func lettering(_ text: String, font name: String, size: CGFloat, tracking: CGFloat, x: CGFloat, baseline: CGFloat) -> (String, Double) {
    let font = CTFontCreateWithName(name as CFString, size, nil)
    precondition(CTFontCopyPostScriptName(font) as String == name, "Required source font is missing")
    let attrs: [NSAttributedString.Key: Any] = [NSAttributedString.Key(kCTFontAttributeName as String):font, NSAttributedString.Key(kCTKernAttributeName as String):tracking]
    let line = CTLineCreateWithAttributedString(NSAttributedString(string:text, attributes:attrs))
    let combined = CGMutablePath()
    for run in CTLineGetGlyphRuns(line) as! [CTRun] {
        let count = CTRunGetGlyphCount(run)
        var glyphs = [CGGlyph](repeating:0,count:count), positions = [CGPoint](repeating:.zero,count:count)
        CTRunGetGlyphs(run, CFRangeMake(0,0), &glyphs)
        CTRunGetPositions(run, CFRangeMake(0,0), &positions)
        for i in 0..<count {
            if let path = CTFontCreatePathForGlyph(font,glyphs[i],nil) {
                let t = CGAffineTransform(a:1,b:0,c:0,d:-1,tx:x+positions[i].x,ty:baseline-positions[i].y)
                combined.addPath(path,transform:t)
            }
        }
    }
    return (pathData(combined), CTLineGetTypographicBounds(line,nil,nil,nil))
}
let palettes:[(String,String,String,String)] = [
    ("light","#245f4c","#172b28","#5a6c66"),
    ("dark","#c9e99b","#ecf2e9","#b5c8bb"),
    ("mono","#181818","#181818","#181818"),
    ("white","#ffffff","#ffffff","#ffffff")
]
func mark(_ color:String, y:CGFloat=0) -> String {
    "<g transform=\"translate(0 \(n(y)))\" fill=\"\(color)\"><path fill-rule=\"evenodd\" d=\"M15 0a15 15 0 1 1 0 30a15 15 0 1 1 0-30M15 7a8 8 0 1 0 0 16a8 8 0 1 0 0-16\"/><path d=\"M19 20h12v7H19z\" transform=\"rotate(45 25 23.5)\"/></g>"
}
func svg(_ w:Int,_ h:Int,_ content:String,_ title:String) -> String {
    "<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 \(w) \(h)\" width=\"\(w)\" height=\"\(h)\" role=\"img\"><title>\(title)</title>\(content)</svg>\n"
}
func write(_ name:String,_ content:String) throws {try content.write(to:output.appendingPathComponent(name),atomically:true,encoding:.utf8)}
for (name,ink,word,tag) in palettes {
    for compact in [false,true] {
        let text = lettering("QGuard",font:"AvenirNext-Heavy",size:23,tracking:-1,x:40,baseline:25)
        let lines = compact ? ["GOOD COMPANY.","GOOD GAMES."] : ["GOOD COMPANY. GOOD GAMES."]
        var content = mark(ink,y:compact ? 13:9) + "<path fill=\"\(word)\" d=\"\(text.0)\"/>"
        var width = text.1
        for (i,line) in lines.enumerated() {
            let result = lettering(line,font:"AvenirNext-DemiBold",size:9,tracking:1.3,x:40,baseline:40+CGFloat(i)*13.5)
            width = max(width,result.1)
            content += "<path fill=\"\(tag)\" d=\"\(result.0)\"/>"
        }
        try write("qguard-\(compact ? "compact":"wide")-\(name).svg",svg(Int(ceil(width))+42,compact ? 58:45,content,"QGuard — Good company. Good games."))
    }
    try write("qguard-mark-\(name).svg",svg(40,40,"<g transform=\"translate(4 4)\">\(mark(ink))</g>","QGuard"))
}
try write("favicon.svg",svg(48,48,"<rect width=\"48\" height=\"48\" rx=\"12\" fill=\"#142d28\"/><g transform=\"translate(8 8)\">\(mark("#c9e99b"))</g>","QGuard"))

// Native raster export of the same simple mark for conventional favicon consumers.
func color(_ hex:UInt32) -> CGColor {CGColor(red:CGFloat((hex>>16)&255)/255,green:CGFloat((hex>>8)&255)/255,blue:CGFloat(hex&255)/255,alpha:1)}
for size in [32,180,512] {
    let ctx = CGContext(data:nil,width:size,height:size,bitsPerComponent:8,bytesPerRow:0,space:CGColorSpaceCreateDeviceRGB(),bitmapInfo:CGImageAlphaInfo.premultipliedLast.rawValue)!
    ctx.translateBy(x:0,y:CGFloat(size));ctx.scaleBy(x:CGFloat(size)/48,y:-CGFloat(size)/48)
    ctx.setFillColor(color(0x142d28));ctx.addPath(CGPath(roundedRect:CGRect(x:0,y:0,width:48,height:48),cornerWidth:12,cornerHeight:12,transform:nil));ctx.fillPath()
    ctx.translateBy(x:8,y:8);ctx.setFillColor(color(0xc9e99b))
    ctx.addEllipse(in:CGRect(x:0,y:0,width:30,height:30));ctx.addEllipse(in:CGRect(x:7,y:7,width:16,height:16));ctx.drawPath(using:.eoFill)
    ctx.translateBy(x:25,y:23.5);ctx.rotate(by:.pi/4);ctx.fill(CGRect(x:-6,y:-3.5,width:12,height:7))
    let destination = CGImageDestinationCreateWithURL(output.appendingPathComponent("qguard-icon-\(size).png") as CFURL,"public.png" as CFString,1,nil)!
    CGImageDestinationAddImage(destination,ctx.makeImage()!,nil);precondition(CGImageDestinationFinalize(destination))
}
let iconPNG = try Data(contentsOf:output.appendingPathComponent("qguard-icon-32.png"))
var ico = Data([0,0,1,0,1,0,32,32,0,0,1,0,32,0])
for value in [UInt32(iconPNG.count),UInt32(22)] {
    var little = value.littleEndian
    withUnsafeBytes(of:&little) { ico.append(contentsOf:$0) }
}
ico.append(iconPNG)
try ico.write(to:output.appendingPathComponent("favicon.ico"))
print("Exported outlined lockups, marks, SVG/ICO favicon and 32/180/512 PNG icons.")
