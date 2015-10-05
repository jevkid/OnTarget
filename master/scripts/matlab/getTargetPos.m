function r = getTargetPos(img)
	[h,w,z] = size(img);

	targetPos = cell(5,2);

	targetPos{1,1} = w/2;
	targetPos{1,2} = h/2;
	targetPos{2,1} = 0;
	targetPos{2,2} = 0;
	targetPos{3,1} = w;
	targetPos{3,2} = 0;
	targetPos{4,1} = 0;
	targetPos{4,2} = h;
	targetPos{5,1} = w;
	targetPos{5,2} = h;

	r = targetPos;
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Function: getTargetPos
%
% Called From: doVideoAnalysis, doImageAnalysis, getRings.
% Returns: An array of [x,y] positions where array[0] is the center and array[1-4] are the 4 corners.
% Description: Finds the 4 corners of the target and returns them.
%
% PSEUDOCODE:
%
% getTargetPos(img):
% 	return [[x0,y0],[x1,y1],[x2,y2],[x3,y3],[x4,y4]]		# Returns x,y values of the center & each corner of the target.
